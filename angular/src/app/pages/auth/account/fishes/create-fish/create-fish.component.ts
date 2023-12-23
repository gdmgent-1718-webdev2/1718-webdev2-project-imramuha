import { Component, OnInit } from '@angular/core';
import { SnotifyService } from 'ng-snotify';
import { AuthService } from '../../../../../services/auth.service';
import { TokenService } from '../../../../../services/token.service';
import { AuthStatusService } from '../../../../../services/auth-status.service';
import {FormControl} from '@angular/forms';


import {ActivatedRoute, Params, Router} from '@angular/router'; //s
import { Fish } from '../../../../../models/fish';

import { AccountService } from '../../../../../services/account.service';
import { MomentDateAdapter } from '@angular/material-moment-adapter';

declare let $: any; 

@Component({
  selector: 'app-create-fish',
  templateUrl: './create-fish.component.html',
  styleUrls: ['./create-fish.component.scss']
})
export class CreateFishComponent implements OnInit {

  minDate = new Date(1900, 0, 1);
  maxDate = new Date();
  model = new Fish();

  public file_src:string = "../assets/img/default_avatar.png";
  public error = null;
  private _categories: any;
  private _subcategories: any;
  private dateFormat: any;

  constructor( 
    private router: Router,
    private accountService: AccountService,
    private notify: SnotifyService,
    private Notfiy:SnotifyService,
    private Token : TokenService,
    private AuthStatus : AuthStatusService,
    private Auth: AuthService,
  ) { }

  ngOnInit() {
   
    this.getAllCategories();
    this.getAllSubcategories();
  }

  addFish(){
    //return console.log(this.model);
    this.accountService
      .addFish(this.model)
      .subscribe(response => {     
      this.router.navigateByUrl('/account/fishes');
      this.Notfiy.success(response.response,{timeout:2500});      
    })
  }

  getAllCategories(){
    this.accountService
    .showAllFishes()
    .subscribe(categories => {
      this._categories = categories[1];
      //console.log(categories);
    })
  }

  getAllSubcategories(){
    this.accountService
    .showAllFishes()
    .subscribe(subcategories => {
      this._subcategories = subcategories[2];
      //console.log(subcategories);

    })
  }

  // hide dafault img if one is uploaded
  imageUploaded(file: any){
    $('img').hide();
    // changes value of default img
    this.model.image = file.src;
  }

  // redone above
  imageRemoved(file: any) {
    $('img').show();
  }
    
  goBack(){
    this.router.navigate(['/account/fishes']);
    this.notify.info('There was no fish added.');
  }

}
