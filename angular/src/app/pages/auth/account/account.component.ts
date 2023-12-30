import {Component, OnInit} from '@angular/core';
import {NotifierService} from 'angular-notifier';
import {ActivatedRoute, Router} from '@angular/router';
import {AccountService} from '../../../services/account.service';

@Component({selector: 'app-account', templateUrl: './account.component.html', styleUrls: ['./account.component.scss']})
export class AccountComponent implements OnInit {

    private readonly notifier : NotifierService;
    private _user : any;
    private messages : any;

    constructor(
        private accountService : AccountService, 
        notifierService : NotifierService, 
        private route : ActivatedRoute, 
        private router : Router
        ) {
        this.notifier = notifierService;
    }

    ngOnInit() {
        this.showUser();
        this.getMyMessages();
    }

    showUser() {
        this
            .accountService
            .showUser()
            .subscribe(user => {
                this._user = user[0];
                console.log(this._user);
            });
    }

    getMyMessages() {
        this
            .accountService
            .showMyMessages()
            .subscribe(messages => {
                this.messages = messages[0];
                console.log(messages);
            })
    }

    deleteMessage(id) {     
        this
            .accountService
            .deleteMessage(id)
            .subscribe(response => {
                this.ngOnInit();
                this
                    .notifier
                    .notify("success", response.response);
            });
    }

}