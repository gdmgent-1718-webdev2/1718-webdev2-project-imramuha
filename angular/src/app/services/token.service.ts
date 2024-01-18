import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable()
export class TokenService {

  private iss = { 
    login: "https://imranm19.sg-host.com/api/login",
    register: "https://imranm19.sg-host.com/api/register",
    fishes: "https://imranm19.sg-host.com/api/account/fishes",
    fishesCreate: "https://imranm19.sg-host.com/api/account/fishes/create",
  }

  constructor(private httpClient: HttpClient) { }

  handle(token) {
    this.set(token);
  }

  set(token) {
    localStorage.setItem('token', token);
  }

  get() {
    return localStorage.getItem('token');
  }

  remove() {
    localStorage.removeItem('token');
  }

  isValid() {
    const token = this.get();

    if (token) {
      const payload = this.payload(token);
      if (payload) {
        // if we have the iss from the ones we declared above, the payload is active
        return Object.values(this.iss).indexOf(payload.iss) > -1 ? true : false;
      }
    }
    return false;
  }

  payload(token) {
    const payload = token.split('.')[1];
    return this.decode(payload);
  }

  decode(payload) {
    return JSON.parse(atob(payload));
  }

  loggedIn(): boolean {
    // if everything is fine -> logged in.
    return this.isValid();
  }

  // Example function to demonstrate HTTP request with token
  getFishes(): Observable<any> {
    const url = this.iss.fishes;
    const headers = new HttpHeaders({
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${this.get()}`
    });

    return this.httpClient.get(url, { headers });
  }
}