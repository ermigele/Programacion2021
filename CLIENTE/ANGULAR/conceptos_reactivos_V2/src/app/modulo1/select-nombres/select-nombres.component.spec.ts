import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SelectNombresComponent } from './select-nombres.component';

describe('SelectNombresComponent', () => {
  let component: SelectNombresComponent;
  let fixture: ComponentFixture<SelectNombresComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SelectNombresComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SelectNombresComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
