Create table SP_FSV_RH(
FNREC number,
FNREC_PODR varchar(64),
summa number,
month_redate date,
flag number)
/
truncate table SP_FSV_RH
/
drop sequence AUTO_SP_FSV_RH
/
Create sequence AUTO_SP_FSV_RH
/
CREATE or replace trigger SP_FSV_RH_TR
  before insert on SP_FSV_RH
  for each row
begin
  select AUTO_SP_FSV_RH.nextval into :NEW.FNREC from dual;
end;

/

---------------------------------------------------------------------------------------

Create table SP_RH_KTU
(
FNREC number,
FNREC_PERSON varchar(64),
FNREC_PODR varchar(64),
DATE_CHANGE date,
BALL number,
DATE_CREATE date,
LOGIN_OWNER varchar(128),
LV_OWNER varchar(8)
)
/
create sequence AUTO_SP_RH_DATE
/
Create or replace trigger SP_RH_DATE_TR
before insert on SP_RH_DATE
for each row
begin
    select AUTO_SP_RH_DATE.NEXTVAL into :NEW.FNREC from dual;
end;
/

select FNREC from SP_RH_DATE where FNREC = (SELECT MAX(FNREC) FROM SP_RH_DATE)
-----------------------------------------------------------------------------------------------------

Create table SP_PDF_RH_KTU
as
Select * from v_sp_rh_rsvi


(
FNREC number,
FNREC_PERSON varchar(64),
FNREC_PODR varchar(64),
FFIO varchar(512),
PODR varchar(512),
BALL number,
CFIN_NAME varchar(64),
DATE_PRINT date
)

/
drop table SP_PDF_RH_KTU
/
create sequence AUTO_SP_PDF_RH_KTU
/
Create or replace trigger SP_PDF_RH_KTU_TR
before insert on SP_PDF_RH_KTU
for each row
begin
    select AUTO_SP_PDF_RH_KTU.NEXTVAL into :NEW.FNREC from dual;
end;
/
insert into SP_PDF_RH_KTU 
Select * from V_SP_RH_RSVI

/
Select * from V_SP_RH_RSVI
        where CFIN_NREC='2'

select * from V_SP_RH_VPRIKAZ_PRINT where CFIN_NREC='2'

