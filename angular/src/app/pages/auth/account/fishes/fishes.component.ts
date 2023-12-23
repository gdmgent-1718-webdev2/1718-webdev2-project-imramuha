import { Component, OnInit } from '@angular/core';
import { SnotifyService } from 'ng-snotify';


import {ActivatedRoute, Params, Router} from '@angular/router'; //s
import { Fish } from '../../../../models/fish';

import { AccountService } from '../../../../services/account.service';

@Component({
  selector: 'app-fishes',
  templateUrl: './fishes.component.html',
  styleUrls: ['./fishes.component.scss']
})
export class FishesComponent implements OnInit {

   fishes: any;

  constructor(
    private router: Router,
    private accountService: AccountService,
    private notify: SnotifyService,
    private Notfiy: SnotifyService
  ) { }



  ngOnInit() {
  
    this.getAllFishes();


  }

  getAllFishes(){
    this.accountService
    .showAllFishes()
    .subscribe(fishes => {
      this.fishes = fishes[0];
      console.log(fishes);

    })
  }



  deleteFish(id){

    this.notify.confirm("Are you sure you want to delete this Fish? ", {timeout: 5000,  buttons: [
      {text: 'Yes', action: () => this.accountService
      .deleteFish(id)
      .subscribe(response => {
        console.log(response);
        this.getAllFishes();
        this.Notfiy.success(response.response,{timeout:5000});
      }), bold: true},
      {text: 'No', action: () => this.notify.info('Your Fish is still avaialable'), bold: false},]} );
   
  }

}

