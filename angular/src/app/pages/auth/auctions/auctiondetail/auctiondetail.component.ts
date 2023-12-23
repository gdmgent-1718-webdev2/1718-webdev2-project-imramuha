import { Component, OnInit } from '@angular/core';
import { SnotifyService } from 'ng-snotify';

import { Bid } from '../../../../models/bid';

import {ActivatedRoute, Params, Router} from '@angular/router'; //s
import * as moment from 'moment';

import { AccountService } from '../../../../services/account.service';

@Component({
  selector: 'app-auctiondetail',
  templateUrl: './auctiondetail.component.html',
  styleUrls: ['./auctiondetail.component.scss']
})
export class AuctiondetailComponent implements OnInit {

  _bid: Bid;    
  currentBid: any;

  constructor(
    private router: Router,
    private route: ActivatedRoute,
    private accountService: AccountService,
    private notify: SnotifyService,
    private Notfiy: SnotifyService
  ) { }

  ngOnInit() {
    this.getAuction();
  }

  getAuction() {
    const id = this.route.snapshot.params['id'];
    console.log(id);
  
    this.accountService
    .showAuction(id)
    .subscribe(bid => {  
      console.log(bid),
        this._bid = bid[0];
        console.log(this._bid);

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
        console.log(response);
        this.router.navigate(['/auctions']);
        this.Notfiy.success(response.response,{timeout:2500});
      
      })
  
    }

}
