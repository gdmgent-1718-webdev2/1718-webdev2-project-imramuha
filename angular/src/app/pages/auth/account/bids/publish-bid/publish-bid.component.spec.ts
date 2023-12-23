import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PublishBidComponent } from './publish-bid.component';

describe('PublishBidComponent', () => {
  let component: PublishBidComponent;
  let fixture: ComponentFixture<PublishBidComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PublishBidComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PublishBidComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
