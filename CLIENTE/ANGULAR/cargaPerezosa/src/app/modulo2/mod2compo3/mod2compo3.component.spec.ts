import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Mod2compo3Component } from './mod2compo3.component';

describe('Mod2compo3Component', () => {
  let component: Mod2compo3Component;
  let fixture: ComponentFixture<Mod2compo3Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Mod2compo3Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Mod2compo3Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
