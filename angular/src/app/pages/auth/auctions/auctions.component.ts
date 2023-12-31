import { Component, OnInit } from '@angular/core';
import {NotifierService} from 'angular-notifier';

import {ActivatedRoute, Params, Router} from '@angular/router';
import { AccountService } from '../../../services/account.service';

@Component({
  selector: 'app-auctions',
  templateUrl: './auctions.component.html',
  styleUrls: ['./auctions.component.scss']
})
export class AuctionsComponent implements OnInit {

  private bids: any;
  private readonly notifier : NotifierService;


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
    notifierService : NotifierService,
  ) {
    this.notifier = notifierService; 
  }

  ngOnInit() {
    this.getAllAuctions();
  }


  
  getAllAuctions(){
    this.accountService
    .showAuctions()
    .subscribe(bids => {
      this.bids = bids[0];
      //console.log(this.bids);
    })
  }
}
