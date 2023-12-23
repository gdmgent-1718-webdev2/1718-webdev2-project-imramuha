import { Component, OnInit } from '@angular/core';
import { AuthStatusService } from '../../../services/auth-status.service';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent implements OnInit {


  public loggedIn: boolean;

  constructor(
    private AuthStatus: AuthStatusService,
  ) { }

  ngOnInit() {
    this.AuthStatus.authStatus.subscribe(value => this.loggedIn = value);
  }


}
