import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { AuthService } from '../../../services/auth.service';
import { SnotifyService } from 'ng-snotify';

@Component({
  selector: 'app-password-reset-response',
  templateUrl: './password-reset-response.component.html',
  styleUrls: ['./password-reset-response.component.scss']
})
export class PasswordResetResponseComponent implements OnInit {

  public error=[];
  public form = {
    email : null,
    password : null,
    password_confirmation:null,
    resetToken :null
  }
  constructor(
    private route: ActivatedRoute,
    private Auth: AuthService,
    private router: Router,
    private Notify: SnotifyService
  ) { 
    route.queryParams.subscribe(params => {
      this.form.resetToken = params['token']
    });
  }

  onSubmit(){
   this.Auth.changePassword(this.form).subscribe(
     data => this.handleResponse(data),
     error => this.handleError(error)
   )
  }

  handleResponse(data){
    const _router = this.router;
    this.Notify.confirm('Your password has been reset, feel free to log in.', {
      buttons:[
        {text: 'Okay', 
        action: toster =>{
           _router.navigateByUrl('/login'),
           this.Notify.remove(toster.id)
          }
      },
      ]
    })
    
  }

  handleError(error){
    this.error = error.error.errors;
  }
  ngOnInit() {
}

}
