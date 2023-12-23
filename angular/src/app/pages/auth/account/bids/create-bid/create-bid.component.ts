import { Component, OnInit } from '@angular/core';
import {ActivatedRoute, Params, Router} from '@angular/router';
import { SnotifyService } from 'ng-snotify';

import { Bid } from '../../../../../models/bid';

import { AccountService } from '../../../../../services/account.service';
import * as moment from 'moment';

@Component({
  selector: 'app-create-bid',
  templateUrl: './create-bid.component.html',
  styleUrls: ['./create-bid.component.scss']
})
export class CreateBidComponent implements OnInit {

  todayDate = new Date().getDate();

  // before tomorrow || after 2 weeks
  minDate = new Date(new Date().setDate(this.todayDate + 1));
  maxDate = new Date(new Date().setDate(this.todayDate + 14));

  public error = null;
  private dateFormat: any;

  private _fishes: any;
  model = new Bid();

  constructor(
    private accountService: AccountService,
    private router: Router,
    private Notfiy:SnotifyService,
  ) { }

  ngOnInit() {
    this.getMyFishes();
  }

  goBack(){
    this.router.navigate(['/account/bids']);
  }

  getMyFishes(){
    this.accountService
    .showMyBids()
    .subscribe(fishes => {
      this._fishes = fishes[1];
      console.log(fishes);
    })
  }

  addBid(){
    //return console.log(this.model);
    this.accountService
      .addBid(this.model)
      .subscribe(response => {     
      this.router.navigateByUrl('/account/bids');
      this.Notfiy.success(response.response,{timeout:2500});
    })
  }


}
