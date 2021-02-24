import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Mod1compo1Component } from './mod1compo1.component';

describe('Mod1compo1Component', () => {
  let component: Mod1compo1Component;
  let fixture: ComponentFixture<Mod1compo1Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Mod1compo1Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Mod1compo1Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
