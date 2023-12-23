import {Component, OnInit} from '@angular/core';
import {ActivatedRoute, Router} from '@angular/router';
import {SnotifyService} from 'ng-snotify';
import * as moment from 'moment';

import {Fish} from '../../../../../models/fish';
import {AccountService} from '../../../../../services/account.service';

declare let $ : any;

@Component({selector: 'app-edit-fish', templateUrl: './edit-fish.component.html', styleUrls: ['./edit-fish.component.scss']})
export class EditFishComponent implements OnInit {

    minDate = new Date(2023, 2, 1);
    maxDate = this.getTomorrow(); // Use the getTomorrow function

    public file_src : string = "../assets/img/default_avatar.png";
    fish : Fish;
    private _categories : any;
    private _subcategories : any;

    constructor(private accountService : AccountService, private notify : SnotifyService, private Notfiy : SnotifyService, private route : ActivatedRoute, private router : Router,) {}

    ngOnInit() {
        this.getOneFish();
        this.getAllCategories();
        this.getAllSubcategories();
    }

    getTomorrow() : Date {
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        return tomorrow;
    }

    getOneFish() {
        const id = this.route.snapshot.params['id'];

        this
            .accountService
            .showFish(id)
            .subscribe(fish => {
                this.fish = fish[0];
                this.fish.id = id;
                this.file_src = this.fish.image as string; // Cast image to string
                console.log(this.fish);
            });
    }

    getAllCategories() {
        this
            .accountService
            .showAllFishes()
            .subscribe(categories => {
                this._categories = categories[1];
            });
    }

    getAllSubcategories() {
        this
            .accountService
            .showAllFishes()
            .subscribe(subcategories => {
                this._subcategories = subcategories[2];
            });
    }

    goBack() {
        this
            .router
            .navigate(['/account/fishes']);
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
            this.fish.image = reader.result as string;
        };
        reader.readAsDataURL(file);
    }

    imageRemove() {
        this.fish.image = null; // Remove the image by setting the property to null
        this.file_src = "../assets/img/default_avatar.png";
    }

    updateFish() {

        this.fish.birthdate = moment(this.fish.birthdate).format('YYYY-MM-DD');
        console.log("before its posted:")
        console.log(this.fish);
        console.log(this.fish.image)

        // Now you can send the updated fish data through the API
        this
            .accountService
            .editFish(this.fish)
            .subscribe(response => {
                console.log("inside updatefish");
                console.log(response);
                this
                    .router
                    .navigate(['/account/fishes']);
                this
                    .Notfiy
                    .success(response.response, {timeout: 2500});
            });
    }

}
