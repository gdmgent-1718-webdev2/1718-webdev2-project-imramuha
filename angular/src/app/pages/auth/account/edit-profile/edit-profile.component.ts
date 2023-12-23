import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params, Router } from '@angular/router';
import { SnotifyService } from 'ng-snotify';

import { AccountService } from '../../../../services/account.service';

import { Customer } from '../../../../models/customer';

declare let $: any;

@Component({
  selector: 'app-edit-profile',
  templateUrl: './edit-profile.component.html',
  styleUrls: ['./edit-profile.component.scss']
})
export class EditProfileComponent implements OnInit {

  _user: Customer;
  public file_src:string = "../assets/img/default_avatar.png";

  constructor(
    private accountService: AccountService,
    private Notfiy: SnotifyService,
    private route: ActivatedRoute,
    private router: Router,
  ) { }

  ngOnInit() {
    this.showUser();
  }

  
  showUser(){
    this.accountService
    .selectUser()
    .subscribe(user => {
      this._user = user[0];
      console.log(this._user);

    })
  }

  imageUploaded(file: any){
    $('img').hide();
    this._user.image = file.src;
  }
 
  imageRemoved(file: any) {
    $('img').show();
    $('#btn-save').attr('disabled','disabled');
    this._user.image = ' ';
    this.file_src = "../assets/img/default_avatar.png";
  }

  goBack(){
    this.router.navigate(['/account/profile']);
  }


   // function for update
   editProfile(){
    this.accountService
    //API call
    .editProfile(this._user)
    .subscribe(response => {
      console.log(response);
      this.router.navigate(['/account/profile']);
      this.Notfiy.success(response.response,{timeout:2500});
    
    })

  }

}
