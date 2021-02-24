import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Mod1compo3Component } from './mod1compo3.component';

describe('Mod1compo3Component', () => {
  let component: Mod1compo3Component;
  let fixture: ComponentFixture<Mod1compo3Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Mod1compo3Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Mod1compo3Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
