import {Component, OnInit} from '@angular/core';
import {ActivatedRoute, Router} from '@angular/router';
import {AuthService} from '../../../services/auth.service';
import {NotifierService} from 'angular-notifier';

@Component({selector: 'app-password-reset-response', templateUrl: './password-reset-response.component.html', styleUrls: ['./password-reset-response.component.scss']})
export class PasswordResetResponseComponent implements OnInit {

    private readonly notifier : NotifierService;
    public error = [];
    public form = {
        email: null,
        password: null,
        password_confirmation: null,
        resetToken: null
    }
    constructor(private route : ActivatedRoute, private Auth : AuthService, private router : Router, notifierService : NotifierService,) {
        route
            .queryParams
            .subscribe(params => {
                this.form.resetToken = params['token']
            });
        this.notifier = notifierService;
    }

    onSubmit() {
        this
            .Auth
            .changePassword(this.form)
            .subscribe(data => this.handleResponse(data), error => this.handleError(error))
    }

    handleResponse(data) {
        const _router = this.router;
        _router.navigateByUrl('/login');
        this
            .notifier
            .notify("success", 'Your password has been reset, feel free to log in.');

    }

    handleError(error) {
        this.error = error.error.errors;
    }
    ngOnInit() {}

}
