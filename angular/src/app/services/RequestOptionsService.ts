import {Injectable} from '@angular/core';
import {
    HTTP_INTERCEPTORS,
    HttpHeaders,
    HttpRequest,
    HttpHandler,
    HttpEvent,
    HttpInterceptor
} from '@angular/common/http';
import {Observable, throwError, timer} from 'rxjs';
import {catchError, switchMap} from 'rxjs/operators';
import {Router} from '@angular/router';
import {NotifierService} from 'angular-notifier';

@Injectable()
export class RequestOptionsService implements HttpInterceptor {
    private readonly notifier : NotifierService;
    constructor(private router : Router, notifierService : NotifierService,) {
        this.notifier = notifierService;
    }

    intercept(request : HttpRequest < any >, next : HttpHandler) : Observable < HttpEvent < any >> {
        return next
            .handle(request)
            .pipe(catchError((error : any) => {
                if (error.status === 401) {

                    // Remove token and redirect to login
                    localStorage.removeItem('token');

                    return new Observable<HttpEvent<any>>();

                }

                return throwError(error);
            }));
    }
}

export const RequestOptionsProvider = {
    provide: HTTP_INTERCEPTORS,
    useClass: RequestOptionsService,
    multi: true
};
