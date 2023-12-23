import { Injectable } from '@angular/core';
import { HTTP_INTERCEPTORS, HttpHeaders, HttpRequest, HttpInterceptor, HttpResponse, HttpHandler, HttpEvent } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable()
export class RequestOptionsService implements HttpInterceptor {
  intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    const headers = new HttpHeaders({
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${localStorage.getItem('token')}`
    });
    console.log(headers);

    const newRequest = request.clone({ headers });
    return next.handle(newRequest);
  }
}

// Provide the interceptor using the HTTP_INTERCEPTORS multi-token
export const requestOptionsProvider = {
  provide: HTTP_INTERCEPTORS,
  useClass: RequestOptionsService,
  multi: true
};