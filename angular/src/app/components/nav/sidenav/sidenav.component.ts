import { Component, OnInit } from '@angular/core';
import { AuthStatusService } from '../../../services/auth-status.service';
import { Router } from '@angular/router';
import { TokenService } from '../../../services/token.service';
import { AuthService } from '../../../services/auth.service';


@Component({
  selector: 'app-sidenav',
  templateUrl: './sidenav.component.html',
  styleUrls: ['./sidenav.component.scss']
})
export class SidenavComponent implements OnInit {

  headers: Headers = new Headers;

  constructor(
    private AuthStatus : AuthStatusService,
    private router : Router,
    private Token : TokenService,
  ) { }

  ngOnInit() {

  }
  public id = 0;

  addClass(id: any) {
    this.id = id;
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
