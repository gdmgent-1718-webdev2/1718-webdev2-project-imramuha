import {Component, OnInit} from '@angular/core';
import {Router} from '@angular/router';

import {AccountService} from '../../../../services/account.service';
import {AuthService} from '../../../../services/auth.service';
import {TokenService} from '../../../../services/token.service';
import {AuthStatusService} from '../../../../services/auth-status.service';
import * as moment from 'moment';

import { Message } from '../../../../models/message';

import {NotifierService} from 'angular-notifier';

declare let $ : any;

@Component({
    selector: 'app-create-message', 
    templateUrl: './create-message.component.html', 
    styleUrls: ['./create-message.component.scss']
})

export class CreateMessageComponent implements OnInit {

    model = new Message();

    private readonly notifier : NotifierService;
    private _users : any;

    constructor(
        private router : Router, 
        private accountService : AccountService, 
        private Token : TokenService, 
        private AuthStatus : AuthStatusService, 
        private Auth : AuthService,
        notifierService : NotifierService, 
        ) {
        this.notifier = notifierService;
        }

    ngOnInit() {
        this.getAllUsers();
    }

    goBack() {
        this
            .router
            .navigate(['/account/profile']);
        this
            .notifier
            .notify("info", "No message want made/sent.");
    }

    getAllUsers() {
        this
            .accountService
            .showAllUsers()
            .subscribe(users => {
                this._users = users[0];
                console.log(this._users)
            })
    } 

    createMessage() {
        this
            .accountService
            .createMessage(this.model)
            .subscribe(response => {
                this
                    .router
                    .navigateByUrl('/account/profile');
                this
                    .notifier
                    .notify("success", response.response);
            });
    }


}
