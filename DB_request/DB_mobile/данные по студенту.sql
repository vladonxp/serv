
--------------------------------------------------------------------------------------------
select * from mv_stud_appoint st
    where instr(
        upper(replace(replace(st.FFIO,'.',''),' ','')),
        upper(replace(replace('Якимчук Александр В.','.',''),' ','')),1)>=1

------------------------------------------------------------------------------------------
--Create view V_STUD_APPOINT as
Select FPERSONS, FFIO,FTABNMB,FSEX,FCOURSE,ZACH,FAK,SPEC,GRUP,BUD   from mv_stud_appoint
Where FFIO='Якимчук Александр Васильевич'
---------------------------------------------------------------------------------------------



