import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Mod3compo3Component } from './mod3compo3.component';

describe('Mod3compo3Component', () => {
  let component: Mod3compo3Component;
  let fixture: ComponentFixture<Mod3compo3Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Mod3compo3Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Mod3compo3Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
