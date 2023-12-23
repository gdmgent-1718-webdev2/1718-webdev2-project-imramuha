import { Component, OnInit } from '@angular/core';
import { AuthStatusService } from '../../../services/auth-status.service';
import { TokenService } from '../../../services/token.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.scss']
})
export class NavComponent implements OnInit {

  public loggedIn: boolean;

  constructor(
    private AuthStatus: AuthStatusService,
    private Token : TokenService,
    private router : Router,
  ) { }

  ngOnInit() {
    this.AuthStatus.authStatus.subscribe(value => this.loggedIn = value);
  }

  logout(event: MouseEvent) {
    event.preventDefault();

    this.Token.remove();
    // localStorage.removeItem('user');


    // changes our auth status to false / logsout
    this.AuthStatus.changeAuthStatus(false);
    // redirects to home
    this.router.navigateByUrl('/');
  }

}
