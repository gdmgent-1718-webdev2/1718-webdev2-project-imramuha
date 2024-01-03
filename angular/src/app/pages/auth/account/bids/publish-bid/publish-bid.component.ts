import { Component, OnInit,  ChangeDetectorRef } from '@angular/core';


import {ActivatedRoute, Params, Router} from '@angular/router';
import {NotifierService} from 'angular-notifier';

import { Bid } from '../../../../../models/bid';

import { AccountService } from '../../../../../services/account.service';
import * as moment from 'moment';


@Component({
  selector: 'app-publish-bid',
  templateUrl: './publish-bid.component.html',
  styleUrls: ['./publish-bid.component.scss'],
})
export class PublishBidComponent implements OnInit {

  private readonly notifier : NotifierService;
  
  todayDate = new Date().getDate();
  // before tomorrow || after 2 weeks
  minDate = new Date(new Date().setDate(this.todayDate + 1));
  maxDate = new Date(new Date().setDate(this.todayDate + 14));

  _bid: Bid;    

  public error = null;
  private dateFormat: any;

  private _fishes: any;                                                                                                                                                                                                           

  constructor(
    private cdRef: ChangeDetectorRef,
    private accountService: AccountService,
    notifierService : NotifierService, 
    private route: ActivatedRoute,
    private router: Router,
    ) {
    this.notifier = notifierService; 
  }

  ngOnInit() {
    this.getOneBid();
    this.getMyFishes();   

    }


  getOneBid() {
    const id = this.route.snapshot.params['id'];

  
    this.accountService
    .showBid(id)
    .subscribe(bid => {  

        this._bid = bid[0];

        this._bid.id = id;
        this._bid.days_or_hours = 'hours';


        // date to hours
        const _started_at: string = this._bid.started_at;
        const _ended_at: string = this._bid.ended_at;

        const diffInMs: number = Date.parse(_ended_at) - Date.parse(_started_at);
        const diffInHours: number = diffInMs / 1000 / 60 / 60;
        this._bid.ended_at = diffInHours.toFixed();

        // date format
        this._bid.started_at = moment(this._bid.started_at).format("YYYY-MM-DD");

      })

  }

  
  getMyFishes(){
    this.accountService
    .showMyBids()
    .subscribe(fishes => {
      this._fishes = fishes[1];

    })
  }
  
  goBack(){
    this.router.navigate(['/account/bids']);
  }

  // function for update
  publishBid(){
    this.accountService
    //API call
    .publishBid(this._bid)
    .subscribe(response => {
   
      this.router.navigate(['/account/bids']);
      this.notifier.notify("success", response.response);
    
    })

  }

}
