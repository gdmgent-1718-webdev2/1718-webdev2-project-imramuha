import { Component, OnInit } from '@angular/core';

import { SnotifyService } from 'ng-snotify';
import {ActivatedRoute, Params, Router} from '@angular/router';
import { AccountService } from '../../../../services/account.service';

@Component({
  selector: 'app-offers',
  templateUrl: './offers.component.html',
  styleUrls: ['./offers.component.scss']
})
export class OffersComponent implements OnInit {

  
  private offers: any;

  constructor( 
    private router: Router,
    private accountService: AccountService,
    private notify: SnotifyService,
    private Notfiy:SnotifyService,
  ) { }
  
  ngOnInit() {
    this.getMyOffers();
  }

  getMyOffers(){
    this.accountService
    .showMyOffers()
    .subscribe(offers => {
      this.offers = offers[0];
      console.log(offers);
    })
  }

}
