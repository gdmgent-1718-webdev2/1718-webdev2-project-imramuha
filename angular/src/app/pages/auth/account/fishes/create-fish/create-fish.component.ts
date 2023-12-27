import {Component, OnInit} from '@angular/core';
import {SnotifyService} from 'ng-snotify';
import {AuthService} from '../../../../../services/auth.service';
import {TokenService} from '../../../../../services/token.service';
import {AuthStatusService} from '../../../../../services/auth-status.service';
import * as moment from 'moment';

import {Router} from '@angular/router'; //s
import {Fish} from '../../../../../models/fish';

import {AccountService} from '../../../../../services/account.service';

declare let $ : any;

@Component({selector: 'app-create-fish', templateUrl: './create-fish.component.html', styleUrls: ['./create-fish.component.scss']})
export class CreateFishComponent implements OnInit {

    minDate = new Date(2023, 2, 1);
    maxDate = this.getTomorrow(); // Use the getTomorrow function
    model = new Fish();

    public file_src : string = "../assets/img/default_avatar.png";
    public error = null;
    private _categories : any;
    private _subcategories : any;
    private dateFormat : any;

    constructor(private router : Router, private accountService : AccountService, private notify : SnotifyService, private Notfiy : SnotifyService, private Token : TokenService, private AuthStatus : AuthStatusService, private Auth : AuthService,) {}

    ngOnInit() {
        this.getAllCategories();
        this.getAllSubcategories();
    }

    getTomorrow() : Date {
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        return tomorrow;
    }

    getAllCategories() {
        this
            .accountService
            .showAllFishes()
            .subscribe(categories => {
                this._categories = categories[1];
            })
    }

    getAllSubcategories() {
        this
            .accountService
            .showAllFishes()
            .subscribe(subcategories => {
                this._subcategories = subcategories[2];
            })
    }

    goBack() {
        this
            .router
            .navigate(['/account/fishes']);
        this
            .notify
            .info('There was no fish added.');
    }
    imageUpload(event : any) {
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
            this.model.image = reader.result as string;
        };
        reader.readAsDataURL(file);
    }

    imageRemove() {
        this.model.image = null; // Remove the image by setting the property to null
        this.file_src = "../assets/img/default_avatar.png";
    }

    addFish() {
        // Assuming this.model is an instance of the Fish model
        this.model.birthdate = moment(this.model.birthdate).format('YYYY-MM-DD');

        this
            .accountService
            .addFish(this.model)
            .subscribe(response => {
                this
                    .router
                    .navigateByUrl('/account/fishes');
                this
                    .Notfiy
                    .success(response.response, {timeout: 2500});
            });
    }

}
