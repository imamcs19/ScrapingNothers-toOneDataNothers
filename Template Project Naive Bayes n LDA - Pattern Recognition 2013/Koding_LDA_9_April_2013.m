% draft koding LDA 9 April 2013
% Oleh: Imam Cholissodin
% Fakultas Ilmu Komputer (Filkom) UB

clc;
close all;
clear all;

xpuyuh=[7.8	9.0;...
8.0	9.3;...
8.3	9.1;...
8.0	9.1;...
7.8	9.4]
    
xbebek=[12.5	15.3;...
13.9	15.6;...
13.4	16.3;...
12.1	15.6;...
12.1	15.7]

m_xpuyuh=mean(xpuyuh)
m_xbebek=mean(xbebek) 
m_global=mean([xpuyuh;xbebek])

m_globalxpuyuh=repmat(m_global,size(xpuyuh,1),1);
m_globalxbebek=repmat(m_global,size(xbebek,1),1);

xopuyuh=xpuyuh-m_globalxpuyuh
xobebek=xbebek-m_globalxbebek

cpuyuh=xopuyuh'*xopuyuh./size(xopuyuh,1)

cbebek=xobebek'*xobebek./size(xobebek,1)

ppuyuh=size(xopuyuh,1)/(size(xopuyuh,1)+size(xobebek,1))
pbebek=size(xobebek,1)/(size(xopuyuh,1)+size(xobebek,1))

c=(ppuyuh.*cpuyuh)+(pbebek.*cbebek)

c_invers=inv(c)

% data yang diuji
xtest=[12.2 9.2]

p_kelas_puyuh_given_x=(m_xpuyuh*c_invers*xtest')...
    -((1/2)*m_xpuyuh*c_invers*m_xpuyuh')+log(ppuyuh)

p_kelas_bebek_given_x=(m_xbebek*c_invers*xtest')...
    -((1/2)*m_xbebek*c_invers*m_xbebek')+log(pbebek)

if(p_kelas_puyuh_given_x>p_kelas_bebek_given_x)
    disp(strcat('Jadi X = { KH =',{' '},num2str(xtest(1)),' dan KV =',{' '},num2str(xtest(2)),' } Masuk ke Kelas Puyuh'))
else
    disp(strcat('Jadi X = { KH =',{' '},num2str(xtest(1)),' dan KV =',{' '},num2str(xtest(2)),' } Masuk ke Kelas Bebek'))
end
