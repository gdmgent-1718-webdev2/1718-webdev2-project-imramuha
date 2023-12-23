import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AuctiondetailComponent } from './auctiondetail.component';

describe('AuctiondetailComponent', () => {
  let component: AuctiondetailComponent;
  let fixture: ComponentFixture<AuctiondetailComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AuctiondetailComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AuctiondetailComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
