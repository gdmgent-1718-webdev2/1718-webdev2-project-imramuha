import { Component, OnInit } from '@angular/core';

import { Router} from '@angular/router';
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
  ) { }
  
  ngOnInit() {
    this.getMyOffers();
  }

  getMyOffers(){
    this.accountService
    .showMyOffers()
    .subscribe(offers => {
      this.offers = offers[0];
  
    })
  }

}
