import { Component, OnInit } from '@angular/core';
import { AuthService } from '../../../services/auth.service';
import { NotifierService } from 'angular-notifier';

@Component({
  selector: 'app-password-reset-request',
  templateUrl: './password-reset-request.component.html',
  styleUrls: ['./password-reset-request.component.scss']
})
export class PasswordResetRequestComponent implements OnInit {

  private readonly notifier : NotifierService;
  public error = null;

  public form = {
    email: null,
  }

  constructor(
    private Auth: AuthService,
    notifierService : NotifierService, 
    ) {
    this.notifier = notifierService;
  }

  ngOnInit() {
  }

  onSubmit() {
    this.notifier.notify("info", 'Your email is being checked...');
    this.Auth.sendPasswordResetLink(this.form).subscribe(
      data => this.handleResponse(data),
    );
}

  handleResponse(res) {
    this.notifier.notify("success", res.data);
    this.form.email = null;
  }
}
