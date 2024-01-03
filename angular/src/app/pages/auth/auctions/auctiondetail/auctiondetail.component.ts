import { Component, OnInit } from '@angular/core';
import {NotifierService} from 'angular-notifier';

import { Bid } from '../../../../models/bid';

import {ActivatedRoute, Params, Router} from '@angular/router'; //s

import { AccountService } from '../../../../services/account.service';

@Component({
  selector: 'app-auctiondetail',
  templateUrl: './auctiondetail.component.html',
  styleUrls: ['./auctiondetail.component.scss']
})
export class AuctiondetailComponent implements OnInit {

  private readonly notifier : NotifierService;

  _bid: Bid;    
  currentBid: any;

  constructor(
    private router: Router,
    private route: ActivatedRoute,
    private accountService: AccountService,
    notifierService : NotifierService, 
    ) {
    this.notifier = notifierService; 
  }

  ngOnInit() {
    this.getAuction();
  }

  getAuction() {
    const id = this.route.snapshot.params['id'];
  
  
    this.accountService
    .showAuction(id)
    .subscribe(bid => {  
  
        this._bid = bid[0];
   

        this.currentBid = this._bid.bid;
        
      })
  }

  goBack(){
    this.router.navigate(['/auctions']);
  }

    // function for update
    raiseBid(){
      this.accountService
      //API call
      .raiseBid(this._bid)
      .subscribe(response => {

        this.router.navigate(['/auctions']);
        this.notifier.notify("success", response.response);
      })
  
    }

}
