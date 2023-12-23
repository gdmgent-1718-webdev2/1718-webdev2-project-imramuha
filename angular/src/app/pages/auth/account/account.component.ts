import { Component, OnInit } from '@angular/core';

import { AccountService } from '../../../services/account.service';

@Component({
  selector: 'app-account',
  templateUrl: './account.component.html',
  styleUrls: ['./account.component.scss']
})
export class AccountComponent implements OnInit {

  private _user: any;

  constructor(
    private accountService: AccountService,
  ) { }

  ngOnInit() {
    this.showUser();
  }

  showUser() {
    this.accountService
    .showUser()
    .subscribe(user => {
      this._user = user[0];

      // console.log(this._user);

    });
  }

}

