import { Component, OnInit } from '@angular/core';
import { AuthService } from '../../../services/auth.service';
import { SnotifyService } from 'ng-snotify';

@Component({
  selector: 'app-password-reset-request',
  templateUrl: './password-reset-request.component.html',
  styleUrls: ['./password-reset-request.component.scss']
})
export class PasswordResetRequestComponent implements OnInit {


  public error = null;

  public form = {
    email: null,
  }

  constructor(
    private Auth: AuthService,
    private notify: SnotifyService,
    private Notfiy:SnotifyService
  ) { }

  ngOnInit() {
  }

  onSubmit() {
    this.Notfiy.info('Your email is being checked...' ,{timeout:2000})
    this.Auth.sendPasswordResetLink(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.notify.error(error.error.error)
    );
}

  handleResponse(res) {
    this.Notfiy.success(res.data,{timeout:0});
    this.form.email = null;
  }
}
