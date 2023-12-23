import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateFishComponent } from './create-fish.component';

describe('CreateFishComponent', () => {
  let component: CreateFishComponent;
  let fixture: ComponentFixture<CreateFishComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CreateFishComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CreateFishComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
