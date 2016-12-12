Select COUNT(*)
FROM (Select *
		FROM submission S,  org O, gendetails G, astatus T
		WHERE O.orgname ='JEMA' and o.OrgID = G.Proj_OrgID and
			  S.Sub_ProjectID = G.ProjectID and S.SubID = T.Stat_SubID and
		SubID= (SELECT MAX(SubID) 
					from submission S1 where S.Sub_ProjectID = S1.Sub_ProjectID
					and stat is not null) ) as ACTS
Where stat = 'Pending' 