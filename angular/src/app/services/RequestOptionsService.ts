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
                    console.log('Unauthorized response, logging out');

                    // Remove token and redirect to login
                    localStorage.removeItem('token');

                    return timer(2000).pipe(
                      switchMap(() => {
                        window.location.href = '/login';
                    this
                        .notifier
                        .notify("info", "Token expired, logging user out.");

                        // Return an empty observable to prevent the original request from reaching the server
                        return new Observable<HttpEvent<any>>();
                      })
                    );
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
