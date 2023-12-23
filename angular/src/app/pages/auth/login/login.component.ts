import { Component, OnInit } from '@angular/core';
import { AuthService } from '../../../services/auth.service';
import { TokenService } from '../../../services/token.service';
import { AuthStatusService } from '../../../services/auth-status.service';
import { Router } from '@angular/router';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  // model
  public form = {
    email: null,
    password: null
  }

  public error = null;
  
  constructor(
    private Auth: AuthService,
    private Token: TokenService,
    private AuthStatus: AuthStatusService,
    private router: Router,
    private httpClient: HttpClient
  ) { }

  onSubmit() {
    this.Auth.login(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.handleError(error),
    );
  }

  handleError(error) {
    this.error = error.error.error;
  }

  // handle data/token
  handleResponse(data) {
    this.Token.handle(data.access_token);

    // changes our auth status
    this.AuthStatus.changeAuthStatus(true);

    // when we get the token then the user is redirected to the account
    this.router.navigateByUrl('/account/profile');
  }

  ngOnInit() {
  }

}
