import { Component, OnInit } from '@angular/core';
import { SnotifyService } from 'ng-snotify';


import {ActivatedRoute, Params, Router} from '@angular/router';

import { AccountService } from '../../../../services/account.service';

@Component({
  selector: 'app-bids',
  templateUrl: './bids.component.html',
  styleUrls: ['./bids.component.scss']
})
export class BidsComponent implements OnInit {

  private bids: any;

  constructor( 
    private router: Router,
    private accountService: AccountService,
    private notify: SnotifyService,
    private Notfiy:SnotifyService,
  ) { }
  
  ngOnInit() {
    this.getMyBids();
  }

  getMyBids(){
    this.accountService
    .showMyBids()
    .subscribe(bids => {
      this.bids = bids[0];
      console.log(bids);
    })
  }

  goBack(){
    this.router.navigate(['/account/bids']);
    this.notify.info('No bid was added.');
  }

}
