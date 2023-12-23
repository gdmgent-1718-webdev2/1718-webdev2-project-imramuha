import { Component, OnInit } from '@angular/core';
import { SnotifyService } from 'ng-snotify';



import {ActivatedRoute, Params, Router} from '@angular/router';
import { Fish } from '../../../models/fish';
import * as moment from 'moment';

import { AccountService } from '../../../services/account.service';

@Component({
  selector: 'app-auctions',
  templateUrl: './auctions.component.html',
  styleUrls: ['./auctions.component.scss']
})
export class AuctionsComponent implements OnInit {

  private bids: any;


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
    private Notfiy: SnotifyService
  ) {
   }

  ngOnInit() {
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
