import {Component, OnInit} from '@angular/core';
import {ActivatedRoute, Params, Router} from '@angular/router';
import {NotifierService} from 'angular-notifier';

import {AccountService} from '../../../../services/account.service';
import {Customer} from '../../../../models/customer';

declare let $ : any;

@Component({selector: 'app-edit-profile', templateUrl: './edit-profile.component.html', styleUrls: ['./edit-profile.component.scss']})
export class EditProfileComponent implements OnInit {

    _user : Customer;
    public file_src : string = "../assets/img/default_avatar.png";
    private readonly notifier : NotifierService;

    constructor(
        private accountService : AccountService, 
        notifierService : NotifierService, 
        private route : ActivatedRoute, 
        private router : Router,
        ) {
            this.notifier = notifierService; 
        }

    ngOnInit() {
        this.showUser();
    }

    showUser() {
        this
            .accountService
            .selectUser()
            .subscribe(user => {
                this._user = user[0];
            
            });
    }

    imageUpload(event: any) {
      const file = event.target.files[0];
    
      if (file) {
        const reader = new FileReader();
        reader.onload = () => {
          this.file_src = reader.result as string;
          this.convertFileToBase64(file);
        };
        reader.readAsDataURL(file);
      }
    }

    convertFileToBase64(file : File) {
        const reader = new FileReader();
        reader.onloadend = () => {
            // Set the image property to the base64-encoded string
            this._user.image = reader.result as string;
        };
        reader.readAsDataURL(file);
    }

    imageRemoved() {
        this._user.image = ''; // Remove the image by setting the property to an empty string
        this.file_src = "../assets/img/default_avatar.png";
    }

    goBack() {
        this
            .router
            .navigate(['/account/profile']);
    }

    /// function for update
    updateProfile() {


      // Now you can send the updated fish data through the API
      this
          .accountService
          .editProfile(this._user)
          .subscribe(response => {
              this
                  .router
                  .navigate(['/account/profile']);
                this.notifier.notify("success", response.response);
          });
  }

}
