import {Component, OnInit} from '@angular/core';
import {NotifierService} from 'angular-notifier';

import {ActivatedRoute, Params, Router} from '@angular/router'; //s
import {Fish} from '../../../../models/fish';

import {AccountService} from '../../../../services/account.service';

@Component({selector: 'app-fishes', templateUrl: './fishes.component.html', styleUrls: ['./fishes.component.scss']})
export class FishesComponent implements OnInit {

    fishes : any;

    constructor(private router : Router, private accountService : AccountService,) {}

    ngOnInit() {
        this.getAllFishes();
    }

    getAllFishes() {
        this
            .accountService
            .showAllFishes()
            .subscribe(fishes => {
                this.fishes = fishes[0];
         

            })
    }

    deleteFish(id) {

        this
            .accountService
            .deleteFish(id)
            .subscribe(response => {
          
                this.getAllFishes();;
            });

    }

}
