// @ts-nocheck
import { Component, OnInit } from '@angular/core';
import { SnotifyService } from 'ng-snotify';

import {ActivatedRoute, Params, Router} from '@angular/router';
import { AuthStatusService } from '../../../services/auth-status.service';

import { AccountService } from '../../../services/account.service';

@Component({
  selector: 'app-about-us',
  templateUrl: './about-us.component.html',
  styleUrls: ['./about-us.component.scss']
})
export class AboutUsComponent implements OnInit {
callback($event: any) {
throw new Error('Method not implemented.');
}

  private bids: any;
  public loggedIn: boolean;


  text:any = {
    Year: 'Year',
    Month: 'Month',
    Weeks: "Weeks",
    Days: "",
    Hours: "",
    Minutes: "",
    Seconds: "",
    MilliSeconds: "MilliSeconds"
  };

  constructor(
    private router: Router,
    private route: ActivatedRoute,
    private accountService: AccountService,
    private notify: SnotifyService,
    private Notfiy: SnotifyService,
    private AuthStatus: AuthStatusService,
  ) {
   }

  ngOnInit() {
    this.AuthStatus.authStatus.subscribe(value => this.loggedIn = value);
    this.getAllAuctions();

  }

  
  getAllAuctions(){
    this.accountService
    .showAuctions()
    .subscribe(bids => {
      this.bids = bids[0];
      console.log(this.bids);

      //this.bids.ended_at = Date.parse(this.bids.ended_at);
      console.log(this.bids);

    })
  }
}
