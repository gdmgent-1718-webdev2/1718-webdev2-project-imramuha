import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

// Components
import { LoginComponent } from './pages/auth/login/login.component';
import { RegisterComponent } from './pages/auth/register/register.component';
import { PasswordResetRequestComponent } from './pages/auth/password-reset-request/password-reset-request.component';
import { PasswordResetResponseComponent } from './pages/auth/password-reset-response/password-reset-response.component';
import { AboutUsComponent } from './pages/discover/about-us/about-us.component';
import { FaqComponent } from './pages/discover/faq/faq.component';
import { ContactUsComponent } from './pages/discover/contact-us/contact-us.component';
import { TermsOfServiceComponent } from './pages/discover/terms-of-service/terms-of-service.component';
import { PrivacyPolicyComponent } from './pages/discover/privacy-policy/privacy-policy.component';
import { SitemapComponent } from './pages/discover/sitemap/sitemap.component';

import { AuctionsComponent } from './pages/auth/auctions/auctions.component';
import { AuctiondetailComponent } from './pages/auth/auctions/auctiondetail/auctiondetail.component';
// Components - account 
import { AccountComponent } from './pages/auth/account/account.component';
import { EditProfileComponent } from './pages/auth/account/edit-profile/edit-profile.component';
import { CreateMessageComponent } from './pages/auth/account/create-message/create-message.component';

import { FishesComponent } from './pages/auth/account/fishes/fishes.component';
import { CreateFishComponent } from './pages/auth/account/fishes/create-fish/create-fish.component';
import { EditFishComponent } from './pages/auth/account/fishes/edit-fish/edit-fish.component';

import { BidsComponent } from './pages/auth/account/bids/bids.component';
import { CreateBidComponent } from './pages/auth/account/bids/create-bid/create-bid.component';
import { PublishBidComponent } from './pages/auth/account/bids/publish-bid/publish-bid.component';
import { OffersComponent } from './pages/auth/account/offers/offers.component';
import { SettingsComponent } from './pages/auth/account/settings/settings.component';


// Services
import { GuestService } from './services/guest.service'; // -> Only guest can see these
import { UserService } from './services/user.service'; // Only loggedIn can see these 
import { SidenavComponent } from './components/nav/sidenav/sidenav.component';

const appRoutes: Routes = [
  {
    path:'',
    component: AboutUsComponent,
  },
  {
    path:'login',
    component: LoginComponent,
    canActivate: [GuestService],
  },
  {
    path:'register',
    component: RegisterComponent,
    canActivate: [GuestService],
  },
  {
    path:'password-reset-request',
    component: PasswordResetRequestComponent,
    canActivate: [GuestService],
  },
  {
    path:'password-reset-response',
    component: PasswordResetResponseComponent,
    canActivate: [GuestService],
  },
  {
    path:'faq',
    component: FaqComponent,
  },
  {
    path:'contact-us',
    component: ContactUsComponent,
    canActivate: [UserService],
  },
  {
    path:'terms-of-service',
    component: TermsOfServiceComponent,
  },
  {
    path:'privacy-policy',
    component: PrivacyPolicyComponent,
  },
  {
    path:'sitemap',
    component: SitemapComponent,
  },
  {
    path:'auctions',
    component: AuctionsComponent,
    canActivate: [UserService],
  },
  {
    path:'auctions/select/:id',
    component: AuctiondetailComponent,
    canActivate: [UserService],
  },
  {
    path: 'account/profile',        
    component: AccountComponent,
    canActivate: [UserService], 

  },
  {
    path: 'account/profile/select',
    component: EditProfileComponent,
    canActivate: [UserService], 
  },
  {
    path: 'account/messages/create',
    component: CreateMessageComponent,
    canActivate: [UserService], 
  },
  {
    path: 'account/fishes',
    component: FishesComponent,
    canActivate: [UserService], 
  },
  {
    path: 'account/fishes/create',
    component: CreateFishComponent,
    canActivate: [UserService], 
  },
  {
    path: 'account/fishes/edit/:id',
    component: EditFishComponent,
    canActivate: [UserService], 
  },
  {
    path: 'account/bids',
    component: BidsComponent,
    canActivate: [UserService], 
  },
  {
    path: 'account/bids/create',
    component: CreateBidComponent,
    canActivate: [UserService], 
  },
  {
    path: 'account/bids/edit/:id',
    component: PublishBidComponent,
    canActivate: [UserService], 
  },
  {
    path: 'account/offers',
    component: OffersComponent,
    canActivate: [UserService], 
  },
  {
    path: 'account/settings',
    component: SettingsComponent,
    canActivate: [UserService], 
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(appRoutes)
  ],
  exports: [RouterModule]
})

export class AppRoutingModule { }