import { Component, OnInit } from '@angular/core';
import {NotifierService} from 'angular-notifier';

import { Router} from '@angular/router';
import { AccountService } from '../../../../services/account.service';

@Component({
  selector: 'app-bids',
  templateUrl: './bids.component.html',
  styleUrls: ['./bids.component.scss']
})
export class BidsComponent implements OnInit {

  private readonly notifier : NotifierService;
  private bids: any;

  constructor( 
    private router: Router,
    private accountService: AccountService,
    notifierService : NotifierService, 
    ) {
    this.notifier = notifierService; }
  
  ngOnInit() {
    this.getMyBids();
  }

  getMyBids(){
    this.accountService
    .showMyBids()
    .subscribe(bids => {
      this.bids = bids[0];
      //console.log(bids);
    })
  }

  goBack(){
    this.router.navigate(['/account/bids']);
    this.notifier.notify("info", "No bid was added.");
  }

}
