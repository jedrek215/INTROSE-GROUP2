SELECT O.OrgName as OrgName, 
	   G.ProjectID as ProjectID, G.ActTitle as ActTitle, G.ActPart as ActPart, G.Term as Term, G.TieUp as TieUp, 
       A.ActNature as ActNature, A.ActTime as ActTime, A.ActType as ActType, A.ActVenue as ActVenue, A.EndDate as EndDate,
	   A.OneDate as OneDate, S.SubID as SubID, S.SubType as SubType, S.DateSubmitted as DateSubmitted, D.OfficerID as OfficerID,
	   D.ContNum as ContNum, D.EmailAdd as EmailAdd, D.OfficerName as OfficerName, T.Checker as Checker, T.DateApproved as DateApproved,
	   T.Remarks as Remarks, T.Stat as Stat, T.StatusID as StatusID
FROM   gendetails G, submission S, astatus T, activity A,org O, officerdetails D
where G.ProjectID = A.Act_ProjectID and  S.Sub_ProjectID = G.ProjectID and S.SubID = T.Stat_SubID
              and G.Proj_OrgID = O.OrgID and D.Off_SubID = S.SubID and D.OfficerID = S.SubID