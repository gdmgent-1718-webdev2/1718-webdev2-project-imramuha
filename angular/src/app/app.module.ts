import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import {RouterModule} from '@angular/router';
import {HttpClientModule} from '@angular/common/http';
import {DatePipe} from '@angular/common';
import {AppRoutingModule} from './app-routing.module';
import {AppComponent} from './app.component';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';

// Mat modules
import {MatDatepickerModule} from '@angular/material/datepicker';
import {MatInputModule} from '@angular/material/input';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatNativeDateModule, MAT_DATE_LOCALE} from '@angular/material/core';

import {MatButtonModule} from '@angular/material/button';
import {MatCheckboxModule} from '@angular/material/checkbox';
import {MatSidenavModule} from '@angular/material/sidenav';
import {MatMomentDateModule} from '@angular/material-moment-adapter';

// Components
import {NavComponent} from './components/nav/nav/nav.component';
import {FooterComponent} from './components/nav/footer/footer.component';
import {ContactUsComponent} from './pages/discover/contact-us/contact-us.component';
import {FaqComponent} from './pages/discover/faq/faq.component';
import {LoginComponent} from './pages/auth/login/login.component';
import {RegisterComponent} from './pages/auth/register/register.component';
import {PasswordResetRequestComponent} from './pages/auth/password-reset-request/password-reset-request.component';
import {PasswordResetResponseComponent} from './pages/auth/password-reset-response/password-reset-response.component';
import {AboutUsComponent} from './pages/discover/about-us/about-us.component';
import {TermsOfServiceComponent} from './pages/discover/terms-of-service/terms-of-service.component';
import {PrivacyPolicyComponent} from './pages/discover/privacy-policy/privacy-policy.component';
import {SitemapComponent} from './pages/discover/sitemap/sitemap.component';
import {SidenavComponent} from './components/nav/sidenav/sidenav.component';

// Components - account
import {AccountComponent} from './pages/auth/account/account.component';

import {FishesComponent} from './pages/auth/account/fishes/fishes.component';
import {CreateFishComponent} from './pages/auth/account/fishes/create-fish/create-fish.component';
import {EditFishComponent} from './pages/auth/account/fishes/edit-fish/edit-fish.component';

import {BidsComponent} from './pages/auth/account/bids/bids.component';
import {OffersComponent} from './pages/auth/account/offers/offers.component';
import {SettingsComponent} from './pages/auth/account/settings/settings.component';

import {CreateBidComponent} from './pages/auth/account/bids/create-bid/create-bid.component';
import {CreateMessageComponent} from './pages/auth/account/create-message/create-message.component';
import {EditProfileComponent} from './pages/auth/account/edit-profile/edit-profile.component';
import {PublishBidComponent} from './pages/auth/account/bids/publish-bid/publish-bid.component';
import {AuctionsComponent} from './pages/auth/auctions/auctions.component';
import {AuctiondetailComponent} from './pages/auth/auctions/auctiondetail/auctiondetail.component';

// Services
import {GuestService} from './services/guest.service';
import {UserService} from "./services/user.service";
import {AuthService} from './services/auth.service';
import {AuthStatusService} from './services/auth-status.service';
import {TokenService} from './services/token.service';
import {AccountService} from './services/account.service';

// Problamatic
import {NotifierModule, NotifierOptions} from 'angular-notifier';
import {NgxUploaderModule} from 'ngx-uploader';

/**
 * Custom angular notifier options
 */
const customNotifierOptions : NotifierOptions = {
    position: {
        horizontal: {
            position: 'left',
            distance: 12
        },
        vertical: {
            position: 'bottom',
            distance: 12,
            gap: 10
        }
    },
    theme: 'material',
    behaviour: {
        autoHide: 5000,
        onClick: 'hide',
        onMouseover: 'pauseAutoHide',
        showDismissButton: true,
        stacking: 4
    },
    animations: {
        enabled: true,
        show: {
            preset: 'slide',
            speed: 300,
            easing: 'ease'
        },
        hide: {
            preset: 'fade',
            speed: 300,
            easing: 'ease',
            offset: 50
        },
        shift: {
            speed: 300,
            easing: 'ease'
        },
        overlap: 150
    }
};

@NgModule({
    declarations: [
        AppComponent,
        NavComponent,
        FooterComponent,
        ContactUsComponent,
        FaqComponent,
        LoginComponent,
        RegisterComponent,
        PasswordResetRequestComponent,
        PasswordResetResponseComponent,
        AboutUsComponent,
        TermsOfServiceComponent,
        PrivacyPolicyComponent,
        SitemapComponent,
        AccountComponent,
        SidenavComponent,
        FishesComponent,
        BidsComponent,
        OffersComponent,
        SettingsComponent,
        CreateFishComponent,
        EditFishComponent,
        CreateBidComponent,
        CreateMessageComponent,
        EditProfileComponent,
        PublishBidComponent,
        AuctionsComponent,
        AuctiondetailComponent
    ],
    imports: [
        BrowserModule,
        BrowserAnimationsModule,
        AppRoutingModule,
        RouterModule,
        MatSidenavModule,
        FormsModule,
        ReactiveFormsModule,
        MatDatepickerModule,
        MatMomentDateModule,
        MatButtonModule,
        MatCheckboxModule,
        MatNativeDateModule,
        MatFormFieldModule,
        MatInputModule,
        HttpClientModule,
        NgxUploaderModule,
        NotifierModule.withConfig(customNotifierOptions)
    ],
    providers: [
        AuthService,
        TokenService,
        AuthStatusService,
        AccountService,
        GuestService,
        UserService,
        DatePipe, {
            provide: MAT_DATE_LOCALE,
            useValue: 'de-DE'
        }
    ],
    bootstrap: [AppComponent]
})
export class AppModule {}