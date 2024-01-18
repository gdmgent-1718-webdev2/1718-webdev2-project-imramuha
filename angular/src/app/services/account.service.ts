import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable()
export class AccountService {

  private baseUrl = 'https://imranm19.sg-host.com/api';

  constructor(private httpClient: HttpClient) { }

  private getHeaders(): HttpHeaders {
    return new HttpHeaders({
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${localStorage.getItem('token')}`
    });
  }

  private getRequestOptions(): { headers: HttpHeaders } {
    return { headers: this.getHeaders() };
  }

  /*
  * PROFILE
  */
  showUser(): Observable<any> {
    return this.httpClient.get(`${this.baseUrl}/account/profile`, this.getRequestOptions());
  }

  showAllUsers(): Observable<any> {
    return this.httpClient.get(`${this.baseUrl}/account/users`, this.getRequestOptions());
  }

  selectUser(): Observable<any> {
    return this.httpClient.get(`${this.baseUrl}/account/profile/select`, this.getRequestOptions());
  }

  editProfile(info): Observable<any> {
    const data = JSON.stringify(info);
    return this.httpClient.post(`${this.baseUrl}/account/profile/edit`, data, this.getRequestOptions());
  }

  /*
  * FISHES
  */
  addFish(info): Observable<any> {
    const data = JSON.stringify(info);
    return this.httpClient.post(`${this.baseUrl}/account/fishes/create`, data, this.getRequestOptions());
  }

  showAllFishes(): Observable<any> {
    return this.httpClient.get(`${this.baseUrl}/account/fishes`, this.getRequestOptions());
  }

  showFish(id): Observable<any> {
    return this.httpClient.get(`${this.baseUrl}/account/fishes/select/${id}`, this.getRequestOptions());
  }

  editFish(info): Observable<any> {
    const data = JSON.stringify(info);
   
    return this.httpClient.post(`${this.baseUrl}/account/fishes/edit`, data, this.getRequestOptions());
  }

  deleteFish(id): Observable<any> {
    return this.httpClient.get(`${this.baseUrl}/account/fishes/delete/${id}`, this.getRequestOptions());
  }

  /*
  * BIDS
  */
  addBid(info): Observable<any> {
    return this.httpClient.post(`${this.baseUrl}/account/bids/create`, info, this.getRequestOptions());
  }

  showMyBids(): Observable<any> {
    return this.httpClient.get(`${this.baseUrl}/account/bids`, this.getRequestOptions());
  }

  showBid(id): Observable<any> {
    return this.httpClient.get(`${this.baseUrl}/account/bids/select/${id}`, this.getRequestOptions());
  }

  publishBid(info): Observable<any> {
    return this.httpClient.post(`${this.baseUrl}/account/bids/edit/`, info, this.getRequestOptions());
  }

  deleteBid(id): Observable<any> {
    return this.httpClient.get(`${this.baseUrl}/account/bids/delete/${id}`, this.getRequestOptions());
  }

  /*
  * OFFERS
  */
  showMyOffers(): Observable<any> {
    return this.httpClient.get(`${this.baseUrl}/account/offers`, this.getRequestOptions());
  }


  /* 
  * AUCTIONS
  */ 
  showAuctions(): Observable<any> {
    return this.httpClient.get(`${this.baseUrl}/auctions`, this.getRequestOptions());
  }
  
  showAuction(id): Observable<any> {
    return this.httpClient.get(`${this.baseUrl}/auctions/select/${id}`, this.getRequestOptions());
  }

  raiseBid(info): Observable<any> {
    return this.httpClient.post(`${this.baseUrl}/auctions/raise-bid`, info, this.getRequestOptions());
  }

  /*
  * Messages
  */
  showMyMessages(): Observable<any> {
    return this.httpClient.get(`${this.baseUrl}/account/messages`, this.getRequestOptions());
  }
  deleteMessage(id): Observable<any> {
    return this.httpClient.get(`${this.baseUrl}/account/messages/delete/${id}`, this.getRequestOptions());
  }
  createMessage(info): Observable<any> {
    const data = JSON.stringify(info);
    return this.httpClient.post(`${this.baseUrl}/account/messages/create`, data, this.getRequestOptions());
  }
}
