import { Component, OnInit } from '@angular/core';
import { AuthService } from '../../../services/auth.service';
import { TokenService } from '../../../services/token.service';
import { Router } from '@angular/router';
import { NgForm, NgModel } from '@angular/forms';


@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})
export class RegisterComponent implements OnInit {

  registerForm: NgForm

  public form = {
    username: null,
    email: null,
    password: null,
    password_confirmation: null,
  }

  public error = [];

  constructor(
    private Auth: AuthService,
    private Token : TokenService,
    private router : Router
  ) { }

  onSubmit() {
    this.Auth.register(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.handleError(error),
    )
  }

  // handle data/token
  handleResponse (data) {
    this.Token.handle(data.access_token)
    // when we get the token then user is redirected to account
    this.router.navigateByUrl('/account/profile');
  }

  handleError (error) {
    this.error = error.error.errors;

  }

  ngOnInit() {
  }

}
