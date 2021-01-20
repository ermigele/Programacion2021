import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GHobbitComponent } from './g-hobbit.component';

describe('GHobbitComponent', () => {
  let component: GHobbitComponent;
  let fixture: ComponentFixture<GHobbitComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GHobbitComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GHobbitComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
