import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';
import { TokenService } from './token.service';

@Injectable()
export class AuthStatusService {

  private loggedIn: BehaviorSubject<boolean>;

  // The initialization of authStatus is moved to the constructor
  authStatus: Observable<boolean>;

  // whenever the logged-in var changes, the authStatus changes -> asObservable
  changeAuthStatus(value: boolean) {
    this.loggedIn.next(value);
  }

  constructor(private Token: TokenService) {
    // Initialize loggedIn in the constructor after Token has been initialized
    this.loggedIn = new BehaviorSubject<boolean>(this.Token.loggedIn());

    // Initialize authStatus after loggedIn has been assigned
    this.authStatus = this.loggedIn.asObservable();
  }
}