import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ProvLocComponent } from './prov-loc.component';

describe('ProvLocComponent', () => {
  let component: ProvLocComponent;
  let fixture: ComponentFixture<ProvLocComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ProvLocComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ProvLocComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
