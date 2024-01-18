import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http'


@Injectable()
export class AuthService {

  private baseUrl = 'https://imranm19.sg-host.com/api'

  constructor(private http:HttpClient) { }

  getToken() {
    return localStorage.getItem('token');
  }

  register(data) {
    return this.http.post(`${this.baseUrl}/register`, data)
  }

  login(data) {
    return this.http.post(`${this.baseUrl}/login`, data)
    // is being sent and also saved in the storage console.log(data);
  }

  me(data) {
    return this.http.post(`${this.baseUrl}/me`, data)
  }

  sendPasswordResetLink(data) {
    return this.http.post(`${this.baseUrl}/sendPasswordResetLink`, data)
  }

  changePassword(data) {
    return this.http.post(`${this.baseUrl}/resetPassword`, data)
  }
}