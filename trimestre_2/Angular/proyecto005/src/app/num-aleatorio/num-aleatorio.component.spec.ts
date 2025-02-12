import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NumAleatorioComponent } from './num-aleatorio.component';

describe('NumAleatorioComponent', () => {
  let component: NumAleatorioComponent;
  let fixture: ComponentFixture<NumAleatorioComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [NumAleatorioComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(NumAleatorioComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
